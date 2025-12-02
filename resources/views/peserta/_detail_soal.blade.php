<div class="card">
    <button type="button" id="btn-refresh-soal" class="btn btn-primary btn-sm">
        Refresh Soal
    </button>
    <div class="pull-right" style="font-size:20px; font-weight:bold;">
        Jika soal belum berubah, klik REFRESH. Jangan close browser ini
    </div>

    <hr>
    <div class="panel-body">
        @if(!$template)
            <div class="alert alert-info">
                Soal belum tersedia. Silakan menunggu station dibuka oleh pengawas.
            </div>
        @else
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th width="100"> </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1 .</td>
                            <td>Nomor kasus</td>
                            <td>{{ $template->nomor_station ?? '' }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">2 .</td>
                            <td>Skenario Klinik</td>
                            <td>
                                <font size="6">
                                    {!! $template->soal ?? '' !!}
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3 .</td>
                            <td>Tugas</td>
                            <td>
                                <font size="6">
                                    {!! $template->tugas_mhs ?? '' !!}
                                </font>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr/>
            </div>
        @endif
    </div>
</div>
