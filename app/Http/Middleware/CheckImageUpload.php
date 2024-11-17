<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckImageUpload
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
        
        //periksa mime type dan apakah benar-benar gambar
        if (!in_array($file->getMimeType(), ['gambar/jpeg', 'gambar/jpg', 'gambar/png']) || !getimagesize($file->getPathname())) {
            return response()->json(['message' => 'Invalid file type'], 400);
        }
        
         // Periksa ekstensi file
         $extension = $file->getClientOriginalExtension();
         if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
             return response()->json(['message' => 'Invalid file extension'], 400);
         }
        }
        return $next($request);
    }
}
