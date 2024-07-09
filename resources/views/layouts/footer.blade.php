<?php
use App\Models\Post;

$postFooter = Post::query()->where('catelogue_post_id', 3)->get();
?>

<footer class="bg-gray-900 text-white py-4">
    <div class="container mx-auto px-4">
        <hr class="border-gray-600 mb-4">
        <ul class="flex justify-center mt-3">
            @foreach($postFooter as $post)
                <li class="mr-6">
                    <a href="{{route('chitiet',$post->slug)}}" class="hover:text-gray-400">{{$post->tieu_de}}</a>
                </li>
            @endforeach
        </ul>
        <hr class="border-gray-600 mb-4">
        <p class="text-sm mb-2">&copy; 2024 KienMovie. All rights reserved.</p>
    </div>
</footer>
