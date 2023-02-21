<table width="100%" style="border:1px solid #dedede">
	<tr>

		<td>Judul</td>
		<td>Pengadu</td>
	</tr>
	<?php foreach ($data as  $value): ?>
		<tr>
			<td>{{ $value->judul_pengaduan }}</td>
			<td>{{ $value->masyarakat->nama }}</td>
		</tr>
	<?php endforeach ?>
</table>