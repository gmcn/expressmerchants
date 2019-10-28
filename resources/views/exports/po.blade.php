<table>
    <thead>
    <tr>
        <th>PO #</th>
        <th>Tech Name</th>
        <th>Supplier Type</th>
        <th>Job Type</th>
        <th>Supplier Name</th>
        <th>PO Value</th>
        <th>Material Brief</th>
        <th>Job Location</th>
        <th>Job Number</th>
        <th>POD Uploaded</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($poExports as $poExport)

        <tr>
            <td>{{ $poExport->id }}</td>
            <td>{{ $poExport->name }}</td>
            <td>{{ $poExport->poType }}</td>
            <td>{{ $poExport->poPurpose }}</td>
            <td>{{ $poExport->merchantName }} {{ $poExport->inputMerchant }}</td>
            <td>{{ $poExport->poValue }}</td>
            <td>{{ $poExport->poMaterials }}</td>
            <td>{{ $poExport->poProjectLocation }}</td>
            <td>{{ $poExport->poProject }}</td>
            <td>
              @if ($poExport->poPod)
              Yes
              @else
              No
              @endif
            </td>
            <td>{{ $poExport->created_at }}</td>
        </tr>

    @endforeach
    </tbody>
</table>
