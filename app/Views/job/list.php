  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <!-- <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jobs List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Jobs</a></li>
            </ol>
          </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="container-fluid">
        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">Job</h3>
          </div> -->
          <div>
            <button type="button" class="btn btn-info float-right mt-4 mr-4" onclick="window.location='<?php echo site_url("job/report");?>'">
              Report
            </button>
            <button type="button" class="btn btn-primary float-right mt-4 mr-4" data-toggle="modal" data-target="#addModal">
              Add New Job
            </button>
          </div>
          <div class="card-body">
            <div>
              <table width=100% class="table table-bordered table-striped" id="jobTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name Job</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>UUID</th>
                    <th width="280px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($job_detail as $row) {
                  ?>
                    <tr id="<?php echo $row['id']; ?>">
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['nameJob']; ?></td>
                      <td><?php echo $row['dateFrom']; ?></td>
                      <td><?php echo $row['dateTo']; ?></td>
                      <td><?php echo $row['uuid']; ?></td>
                      <td>
                        <a data-id="<?php echo $row['id']; ?>" class="btn btn-primary btnEdit">Edit</a>
                        <a data-id="<?php echo $row['id']; ?>" class="btn btn-danger btnDelete">Delete</a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Rihan Yosral - Start From 10:30:12 02/03/2024
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Modal for Creating Job -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add New Job</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="addJob" name="addJob" action="<?php echo site_url('job/store'); ?>" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="txtNameJob">Name Job</label>
                    <input type="text" class="form-control" id="txtNameJob" placeholder="Enter name of the job" name="txtNameJob">
                  </div>
                  <div class="form-group">
                    <label for="txtDateFrom">dateFrom</label>
                    <input type="date" class="form-control" id="txtDateFrom" placeholder="Enter date from" name="txtDateFrom">
                  </div>
                  <div class="form-group">
                    <label for="txtDateTo">dateTo</label>
                    <input type="date" class="form-control" id="txtDateTo" placeholder="Enter date to" name="txtDateTo">
                  </div>
                  <div class="form-group">
                    <label for="txtUuid">Uuid</label>
                    <input type="text" class="form-control" id="txtUuid" placeholder="UUID (Generated)" name="txtUuid" disabled>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal for Editing Job -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update Job</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="updateJob" name="updateJob" action="<?php echo site_url('job/update'); ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="hdnJobId" id="hdnJobId" />
                  <div class="form-group">
                    <label for="txtNameJob">Name Job</label>
                    <input type="text" class="form-control" id="txtNameJob" placeholder="Enter name of the job" name="txtNameJob">
                  </div>
                  <div class="form-group">
                    <label for="txtDateFrom">dateFrom</label>
                    <input type="date" class="form-control" id="txtDateFrom" placeholder="Enter date from" name="txtDateFrom">
                  </div>
                  <div class="form-group">
                    <label for="txtDateTo">dateTo</label>
                    <input type="date" class="form-control" id="txtDateTo" placeholder="Enter date to" name="txtDateTo">
                  </div>
                  <div class="form-group">
                    <label for="txtUuid">Uuid</label>
                    <input type="text" class="form-control" id="txtUuid" placeholder="UUID (Generated)" name="txtUuid" disabled>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal for Deleting Job -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
              <div class="modal-body p-0">
                <div class="card border-0 p-sm-3 p-2 justify-content-center">
                  <div class="card-header pb-0 bg-white border-0 ">
                    <div class="row">
                      <div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                    </div>
                    <p class="font-weight-bold mb-2"> Are you sure you wanna delete this job?</p>
                  </div>
                  <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                    <div class="row justify-content-end no-gutters">
                      <div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button></div>
                      <div class="col-auto"><button id="delete_ok" type="button" class="btn btn-danger px-4" data-dismiss="modal">Delete</button></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $("#txtDateTo").change(function() {
      var txtDateFrom = document.getElementById("txtDateFrom").value;
      var txtDateTo = document.getElementById("txtDateTo").value;

      if ((Date.parse(txtDateFrom) > Date.parse(txtDateTo))) {
        alert("dateTo should be greater than or equal with dateFrom");
        document.getElementById("txtDateTo").value = "";
      }
    });

    $(document).ready(function() {
      $('#jobTable').DataTable();

      $("#addJob").validate({
        rules: {
          txtNameJob: "required",
          txtDateFrom: "required",
          txtDateTo: "required",
          // txtUuid: "required",
        },
        messages: {},

        submitHandler: function(form) {
          var form_action = $("#addJob").attr("action");
          $.ajax({
            data: $('#addJob').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function(res) {
              // var job = '<tr ID="' + res.data.id + '">';
              // job += '<td>' + res.data.id + '</td>';
              // job += '<td>' + res.data.nameJob + '</td>';
              // job += '<td>' + res.data.dateFrom + '</td>';
              // job += '<td>' + res.data.dateTo + '</td>';
              // job += '<td>' + res.data.uuid + '</td>';
              // job += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
              // job += '</tr>';
              // $('#jobTable tbody').prepend(job);
              $('#addJob')[0].reset();
              $('#addModal').modal('hide');
              location.reload(true);
            },
            error: function(data) {}
          });
        }
      });

      $('body').on('click', '.btnEdit', function() {
        var job_id = $(this).attr('data-id');
        $.ajax({
          url: 'job/edit/' + job_id,
          type: "GET",
          dataType: 'json',
          success: function(res) {
            $('#updateModal').modal('show');
            $('#updateJob #hdnJobId').val(res.data.id);
            $('#updateJob #txtNameJob').val(res.data.nameJob);
            $('#updateJob #txtDateFrom').val(res.data.dateFrom);
            $('#updateJob #txtDateTo').val(res.data.dateTo);
            $('#updateJob #txtUuid').val(res.data.uuid);
          },
          error: function(data) {}
        });
      });

      $("#updateJob").validate({
        rules: {
          txtNameJob: "required",
          txtDateFrom: "required",
          txtDateTo: "required",
          // txtUuid: "required",
        },
        messages: {},
        submitHandler: function(form) {
          var form_action = $("#updateJob").attr("action");
          $.ajax({
            data: $('#updateJob').serialize(),
            url: form_action,
            type: "POST",
            dataType: 'json',
            success: function(res) {
              // var job = '<tr ID="' + res.data.id + '">';
              // job += '<td>' + res.data.id + '</td>';
              // job += '<td>' + res.data.nameJob + '</td>';
              // job += '<td>' + res.data.dateFrom + '</td>';
              // job += '<td>' + res.data.dateTo + '</td>';
              // job += '<td>' + res.data.uuid + '</td>';
              // job += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>  <a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
              // job += '</tr>';
              // $('#jobTable tbody').prepend(job);
              $('#updateJob')[0].reset();
              $('#updateModal').modal('hide');
              location.reload(true);
            },
            error: function(data) {}
          });
        }
      });

      $('body').on('click', '.btnDelete', function() {
        $('#deleteModal').modal('show');
        $("#deleteModal").attr("data-id", $(this).attr("data-id"));
      });

      $('body').on('click', '#delete_ok', function(){
          var job_id = $("#deleteModal").closest(".modal").attr("data-id");
          $.get('job/delete/' + job_id, function(data) {
            $('#jobTable tbody #' + job_id).remove();
          })
      })

    })
  </script>