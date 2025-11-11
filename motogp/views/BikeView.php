<?php require_once __DIR__.'/Template.php'; ob_start(); ?>
<h2>Bike</h2>

<!-- Create -->
<form method="post" action="index.php?module=bike&action=add">
  <label>Rider
    <select name="rider_id" required>
      <option value="">-- pilih rider --</option>
      <?php foreach ($riders as $r): ?>
        <option value="<?= (int)$r['id'] ?>"><?= htmlspecialchars($r['name']) ?></option>
      <?php endforeach; ?>
    </select>
  </label>
  <input name="model" placeholder="Model (contoh: Desmosedici GP)" required>
  <input name="engine_cc" type="number" placeholder="Engine CC (mis. 1000)">
  <input name="chassis" placeholder="Chassis (opsional)">
  <input name="year" type="number" placeholder="Year">
  <button type="submit">Simpan</button>
</form>

<!-- Read + Update + Delete -->
<table>
  <thead>
    <tr><th>Rider</th><th>Team</th><th>Model</th><th>Engine CC</th><th>Chassis</th><th>Year</th><th>Aksi</th></tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row): ?>
      <tr>
        <td>
          <form method="post" action="index.php?module=bike&action=update">
            <select name="rider_id" required>
              <?php foreach ($riders as $r): ?>
                <option value="<?= (int)$r['id'] ?>" <?= ($r['id']==$row['rider_id'])?'selected':'' ?>>
                  <?= htmlspecialchars($r['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
        </td>
        <td><?= htmlspecialchars($row['team_name'] ?? '') ?></td>
        <td><input name="model" value="<?= htmlspecialchars($row['model']) ?>" required></td>
        <td><input name="engine_cc" type="number" value="<?= htmlspecialchars((string)$row['engine_cc']) ?>"></td>
        <td><input name="chassis" value="<?= htmlspecialchars((string)$row['chassis']) ?>"></td>
        <td><input name="year" type="number" value="<?= htmlspecialchars((string)$row['year']) ?>"></td>
        <td>
          <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
          <button type="submit">Update</button>
          <a href="index.php?module=bike&action=delete&id=<?= (int)$row['id'] ?>"
             onclick="return confirm('Hapus bike ini?')">Hapus</a>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php $content = ob_get_clean(); layout('Bike', $content); ?>
