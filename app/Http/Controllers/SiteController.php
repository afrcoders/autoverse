<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function home()
    {
        $media = $this->mediaCatalog();

        return view('pages.home', [
            'featuredSlides' => $media->take(5)->values(),
            'latestProducts' => $media->take(12)->values(),
            'sidebarItems' => $media->take(8)->values(),
            'categories' => $this->categoriesFrom($media),
        ]);
    }

    public function products(Request $request)
    {
        $media = $this->mediaCatalog();
        $filtered = $this->applyProductFilters($media, $request);

        $perPage = 12;
        $page = LengthAwarePaginator::resolveCurrentPage();
        $results = $filtered->values();

        $products = new LengthAwarePaginator(
            $results->forPage($page, $perPage)->values(),
            $results->count(),
            $perPage,
            $page,
            [
                'path' => route('products.index'),
                'query' => $request->query(),
            ]
        );

        return view('pages.products', [
            'products' => $products,
            'categories' => $this->categoriesFrom($media),
            'filters' => [
                'q' => (string) $request->query('q', ''),
                'type' => (string) $request->query('type', 'all'),
                'category' => (string) $request->query('category', 'all'),
            ],
            'totalCount' => $results->count(),
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    private function mediaCatalog(): Collection
    {
        return Cache::remember('site.local.media.catalog', now()->addMinutes(20), function () {
            $sourceDir = public_path('assets/instagram');
            $thumbnailDir = public_path('assets/instagram-thumbs');

            if (! is_dir($thumbnailDir)) {
                @mkdir($thumbnailDir, 0775, true);
            }

            $categories = [
                'Engine Parts',
                'AC Components',
                'Suspension Parts',
                'Electrical Parts',
                'Body Fittings',
                'Accessories',
            ];

            $files = collect(glob($sourceDir . '/*') ?: [])
                ->filter(fn (string $path) => is_file($path))
                ->filter(function (string $path) {
                    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

                    return in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'mp4', 'webm', 'mov'], true);
                })
                ->sortByDesc(fn (string $path) => @filemtime($path) ?: 0)
                ->values();

            return $files->map(function (string $path, int $index) use ($thumbnailDir, $categories) {
                $filename = basename($path);
                $baseName = pathinfo($filename, PATHINFO_FILENAME);
                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $isVideo = in_array($extension, ['mp4', 'webm', 'mov'], true);

                preg_match('/__(\d{4}-\d{2}-\d{2})T/', $filename, $dateMatch);
                $dateLabel = isset($dateMatch[1])
                    ? (string) Str::of($dateMatch[1])->replace('-', '/')
                    : null;

                $category = $categories[abs(crc32($baseName)) % count($categories)];
                $productCode = strtoupper(substr(md5($filename), 0, 6));

                $thumbnailFile = $baseName . '.jpg';
                $thumbnailPath = $thumbnailDir . DIRECTORY_SEPARATOR . $thumbnailFile;

                if ($isVideo && ! file_exists($thumbnailPath)) {
                    // Try common ffmpeg locations (Homebrew ARM, Homebrew Intel, Linux)
                    $ffmpegPath = collect([
                        '/opt/homebrew/bin/ffmpeg',
                        '/usr/local/bin/ffmpeg',
                        '/usr/bin/ffmpeg',
                    ])->first(fn (string $p) => is_file($p));

                    if (! $ffmpegPath) {
                        $ffmpegPath = trim((string) @shell_exec('which ffmpeg 2>/dev/null'));
                    }

                    if ($ffmpegPath && is_file($ffmpegPath)) {
                        $input = escapeshellarg($path);
                        $output = escapeshellarg($thumbnailPath);
                        @shell_exec("{$ffmpegPath} -y -ss 00:00:01 -i {$input} -frames:v 1 -update 1 -q:v 2 {$output} 2>/dev/null");
                    }
                }

                $image = $isVideo
                    ? (file_exists($thumbnailPath) ? asset('assets/instagram-thumbs/' . $thumbnailFile) : null)
                    : asset('assets/instagram/' . $filename);

                return [
                    'id' => $baseName . '-' . $index,
                    'title' => $category . ' - ' . $productCode,
                    'subtitle' => ($dateLabel ? 'Stock update: ' . $dateLabel . '. ' : '') . 'Original spare part from available inventory.',
                    'image' => $image,
                    'video' => $isVideo ? asset('assets/instagram/' . $filename) : null,
                    'type' => $isVideo ? 'video' : 'image',
                    'category' => $category,
                    'date' => $dateLabel,
                    'link' => 'https://wa.me/2348160101258',
                ];
            });
        });
    }

    private function applyProductFilters(Collection $media, Request $request): Collection
    {
        $query = Str::lower(trim((string) $request->query('q', '')));
        $type = Str::lower((string) $request->query('type', 'all'));
        $category = (string) $request->query('category', 'all');

        return $media->filter(function (array $item) use ($query, $type, $category) {
            if ($type !== 'all' && $item['type'] !== $type) {
                return false;
            }

            if ($category !== 'all' && $item['category'] !== $category) {
                return false;
            }

            if ($query !== '') {
                $haystack = Str::lower($item['title'] . ' ' . $item['subtitle'] . ' ' . $item['category']);

                return Str::contains($haystack, $query);
            }

            return true;
        });
    }

    private function categoriesFrom(Collection $media): Collection
    {
        return $media->pluck('category')->unique()->sort()->values();
    }
}
