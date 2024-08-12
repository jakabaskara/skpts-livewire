<div x-data="{
    isRecordSelected(id) {
        return this.selectedRecordId === id;
    },
}">
    <div class="loading-overlay" wire:loading.class="show"></div>
    {{ $this->table }}

    <x-filament::modal id="view-kutipan" width="6xl">
        <div>
            <h1 class="mb-3 text-2xl text-center">Kutipan</h1>
        </div>
        @if ($modalData)
            @forelse ($modalData as $index => $data)
                <ul class="timeline timeline-vertical">
                    @if ($index == 0)
                        <li>
                            <div class="timeline-start">{{ date('d M Y', strtotime($data->skpts->tanggal)) }}
                            </div>
                            <div class="timeline-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="timeline-end timeline-box">
                                <p>No <span class="px-5"></span> : {{ $data->no_kutipan }}</p>
                                <p>Jabatan <span class="px-1"></span> : {{ $data->jabatan_baru }}
                                </p>
                                @if ($data->keterangan == 'Mutasi')
                                    <div class="badge badge-warning"> {{ $data->keterangan }}</div>
                                @else
                                    <div class="badge badge-accent"> {{ $data->keterangan }}</div>
                                @endif
                                <a href="{{ route('download.kutipan', ['fileName' => $data->file_kutipan]) }}"
                                    class="badge badge-success bg-green-500 hover:bg-green-800 ms-1 mt-3 text-start text-white">
                                    Unduh File
                                </a>
                            </div>
                            <hr class="bg-white py-5" />
                        </li>
                    @else
                        <li>
                            <hr class="bg-white" />
                            <div class="timeline-start">1998</div>
                            <div class="timeline-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="timeline-end timeline-box">iMac</div>
                            <hr />
                        </li>
                    @endif
                </ul>
            @empty
                <h5 class="text-center">Data Kosong</h5>
            @endforelse
        @endif
    </x-filament::modal>
</div>
