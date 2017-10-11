<div class="container">
  <div class="row">
    <div class="col-5">
      <p><em>dunctebot</em> is a multipurpose discord bot with a lot of commands.</p>
    </div>
    <div class="col-7">
      <p>Please contact <em>duncte123#1245</em> on discord if you have any trouble with this bot</p>
    </div>
  </div>
  <hr />
  <div class="row">
    <h1>Command list:</h1>
    <?php require("./includes/commandList.php"); ?>
    <table class="table">
      <thead>
        <tr>
          <th>Command</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($commands as $cmd => $help): ?>
          <tr id="<?php echo $cmd; ?>">
            <td><?php echo "/".$cmd; ?></td>
            <td><?php echo $help; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>