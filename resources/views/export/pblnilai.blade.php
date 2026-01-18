@php
    $pertemuans = [1, 2]; // FIXED: setiap skenario pasti 2 pertemuan
    $colSpanNilai = ($skenarios->count() * 2) + 1; // 2 pertemuan per skenario + kolom rerata
  @endphp
 <table>
        <thead>
          <tr>
            <th colspan="4"></th>
            <th colspan="{{ ($skenarios->count() * count($pertemuans)) + 1 }}" class="text-center">
              Nilai Harian PBL {{ $pbl->name }}
            </th>
          </tr>

          {{-- Header skenario --}}
          <tr>
            <th rowspan="2" class="text-center" style="width:50px;">No</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2" class="text-center" style="width:110px;">NPM</th>
            <th rowspan="2" class="text-center" style="width:120px;">Kelompok</th>

            @foreach($skenarios as $s)
              <th colspan="{{ count($pertemuans) }}" class="text-center">
                Skenario {{ $loop->iteration }}
              </th>
            @endforeach

            <th rowspan="2" class="text-center" style="width:110px;">Rerata Nilai </th>
          </tr>

          {{-- Header pertemuan --}}
          <tr>
            @foreach($skenarios as $s)
              @foreach($pertemuans as $pt)
                <th class="text-center">Prt {{ $pt }}</th>
              @endforeach
            @endforeach
          </tr>
        </thead>

        <tbody>
          @forelse($pesertas as $p)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $p->name }}</td>
              <td class="text-center">{{ $p->npm }}</td>
              <td class="text-center">{{ $p->nama_kelompok ?? '-' }}</td>

              @foreach($skenarios as $s)
                @foreach($pertemuans as $pt)
                  @php
                    // nilai bisa: int, 'Tidak hadir', atau null
                    $val = $matrix[$p->id][$s->id][$pt] ?? null;
                  @endphp

                  <td class="text-center">
                    @if($val === 'Tidak hadir')
                      <span class="text-danger">TH</span>
                    @elseif(is_int($val))
                      {{ $val }}
                    @else
                      -
                    @endif
                  </td>
                @endforeach
              @endforeach

              <td class="text-center">
                @if(isset($rerata[$p->id]) && $rerata[$p->id] !== null)
                  {{ number_format($rerata[$p->id], 2, ',', '.') }}
                @else
                  -
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="{{ 4 + ($skenarios->count() * count($pertemuans)) + 1 }}" class="text-center text-muted">
                Belum ada data peserta/nilai untuk kegiatan ini.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
