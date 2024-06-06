<div>
    <div class="flex justify-center">
        <div class="w-6/12">
            <h1 class="my-10 text-3xl">Comments</h1>
            <section>
                <input type="file" id="image" wire:change="$dispatch('fileChoosen')">
            </section>
            
            <form class="my-4 flex" wire:submit.prevent="addComment">
                <input type="text" 
                    class="w-full rounded border shadow p-2 mr-2 my-2" 
                    placeholder="what's in your mind" 
                    wire:model.live.debounce.500="newComment">
                <div class="py-2">
                    <button class="p-2 w-20 bg-blue-500 rounded text-white shadow" type="submit">Add</button>
                </div>
            </form>
            @error('newComment') <span class="error text-red-500 text-xs">{{ $message }}</span> @enderror
            
            @if (session('message'))
                <div class="p-3 bg-green-300 text-green-900 rounded shadow-sm">
                    {{ session('message') }}
                </div>
            @endif

            @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <p class="font-bold text-lg">{{ $comment->creator->name }}</p>
                        <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <i class="bi bi-x-lg text-dark hover:text-red-500 cursor-pointer" wire:click="removeComment({{ $comment->id }})"></i>
                </div>
                <p class="text-gray-800">{{ $comment->body }}</p>
            </div>
            @endforeach

            {{ $comments->links('pagination-links') }}
        </div>
    </div>
</div>