// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable({
    serverSide: true,
    ajax: {
      url: "{{ url('user/index') }}",
      columns: [{
        data: 'employee.nama_lengkap'
      },
      {
        data: 'employee.nama_lengkap'
      },
      {
        data: 'employee.nama_lengkap'
      },
      ]
    }
  });
});
