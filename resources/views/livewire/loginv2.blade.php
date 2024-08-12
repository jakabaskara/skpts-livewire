<div>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1
                    class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                    Login SKPTS
                </h1>
                <form class="space-y-4 md:space-y-6" wire:submit="submit">
                    <div class="flex items-center justify-between">
                        <div class="w-full">
                            {{ $this->form }}
                        </div>
                    </div>
                    <button type="submit" class="btn border-none hover:bg-amber-600 bg-amber-500 w-full text-white">Sign
                        in</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
                        Versi 1.0
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
