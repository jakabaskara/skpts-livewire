<div class="flex justify-center p-6 text-white">
    <div class="card bg-gray-900 w-full shadow-xl p-6 mx-auto">
        <form wire:submit='submit'>
            <div class="card-header">
                <h3 class="text-4xl ps-8 font-bold">Pengisian Data SKTPS</h3>
            </div>
            <div class="card-body">
                {{ $this->form }}
                {{-- {{ $this->repeater }} --}}

            </div>
            <div class="flex justify-end">
                <div>
                    <button type="submit" class="btn btn-sm pb-7 pt-3 px-8 bg-amber-500 text-white me-3">Create</button>
                </div>
                <div>
                    <a href="{{ route('skpts.index') }}" wire:navigate
                        class="btn btn-load btn-sm pb-7 pt-3 px-8 border-gray-700 text-white">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
