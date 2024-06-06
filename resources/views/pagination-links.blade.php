@if ($paginator->hasPages())
<ul class="flex justify-between">
    <li>
        <button  
            {{ $paginator->onFirstPage() ? 'disabled' : '' }} 
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
            wire:click="previousPage" 
            wire:loading.attr="disabled" 
            rel="prev">Previous</button>
    </li>

    <li>
        <button 
            {{ $paginator->onLastPage() ? 'disabled' : '' }} 
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"

            wire:click="nextPage" 
            wire:loading.attr="disabled" 
            rel="next">Next</button>
    </li>
</ul>
@endif