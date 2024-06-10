<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>NISN</th>
            <th>Nama Siswa</th>
            <th>Tanggal Lahir</th>
            {{-- <th>Age</th> --}}
            {{-- <th>Position</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $index => $s)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="text-left">{{ $s->NISN }}</td>
                <td class="text-left">{{ $s->nama_siswa }}</td>
                <td class="text-left">{{ $s->tanggal_lahir }}</td>
                {{-- <td>{{ $s->jenis_kelamin }}</td>
                <td>{{ $employee->firstname }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->age }}</td>
                <td>{{ $employee->position->name }}</td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
