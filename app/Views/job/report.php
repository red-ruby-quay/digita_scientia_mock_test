  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Report All</h3>
          </div>
          <div class="card-body">
            <div>
              <table width=100% class="table table-bordered table-striped" id="jobTable">
                <thead>
                  <tr>
                    <th style="border:1px solid #000; text-align: center;padding: 4px;"><b>ID</b></th>
                    <th style="border:1px solid #000; text-align: center;padding: 4px;"><b>JobName</b></th>
                    <th style="border:1px solid #000; text-align: center;padding: 4px;"><b>DurationJob</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($job_detail as $row) {
                    $dateFrom = date_create($row['dateFrom']);
                    $dateTo = date_create($row['dateTo']);
                    $durationJob = date_diff($dateFrom, $dateTo);
                  ?>
                    <tr id="<?php echo $row['id']; ?>">
                      <td style="border:1px solid #000; text-align: center;padding: 4px;"><?php echo $row['id']; ?></td>
                      <td style="border:1px solid #000; text-align: center;padding: 4px;"><?php echo $row['nameJob']; ?></td>
                      <td style="border:1px solid #000; text-align: center;padding: 4px;"><?php echo $durationJob->format('%a Hari') ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->