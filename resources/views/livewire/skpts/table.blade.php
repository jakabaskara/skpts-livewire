<div x-data="{
    isRecordSelected(id) {
        return this.selectedRecordId === id;
    },
}">
    <div class="loading-overlay" wire:loading.class="show"></div>
    {{ $this->table }}

    <x-filament::modal id="view-kutipan" width="6xl">
        @if ($modalData)
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="text-white bg-neutral-800 border-b-2 border-neutral-700">
                            <th>#</th>
                            <th>No Kutipan</th>
                            <th>NIK SAP</th>
                            <th>Nama</th>
                            <th>Jabatan Lama</th>
                            <th>Jabatan Baru</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($modalData as $key => $data)
                            <tr class="border-b border-neutral-700" wire:key='$data->id'>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $data->no_kutipan }}</td>
                                <td>{{ $data->nik_sap }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->jabatan_lama }}</td>
                                <td>{{ $data->jabatan_baru }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a target="__blank"
                                        href="{{ route('download.kutipan', ['fileName' => $data->file_kutipan]) }}"
                                        class="btn btn-sm">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-6 text-cyan-400">
                                                <path
                                                    d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625Z" />
                                                <path
                                                    d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                                            </svg>
                                        </span>
                                    </a>

                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="9`">Data Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif


    </x-filament::modal>
</div>
