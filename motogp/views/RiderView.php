<?php require_once __DIR__.'/Template.php'; ob_start(); ?>
<h2>Rider</h2>

<!-- Create -->
<form method="post" action="index.php?module=rider&action=add">
  <input name="name" placeholder="Name" required>
  <input name="nationality" placeholder="Nationality">
  <input name="number" type="number" placeholder="Number">
  <select name="team_id">
    <option value="">-- pilih team --</option>
    <?php foreach ($teams as $t): ?>
      <option value="<?= (int)$t['id'] ?>"><?= htmlspecialchars($t['name']) ?></option>
    <?php endforeach; ?>
  </select>
  <button type="submit">Simpan</button>
</form>

<!-- Read + Update + Delete -->
<table>
  <thead>
    <tr><th>Name</th><th>Nationality</th><th>Number</th><th>Team</th><th>Aksi</th></tr>
  </thead>
  <tbody>
    <?php foreach ($data as $r): ?>
      <tr>
        <td>
          <form method="post" action="index.php?module=rider&action=update">
            <input name="name" value="<?= htmlspecialchars($r['name']) ?>" required>
        </td>
        <td>
            <input name="nationality" value="<?= htmlspecialchars((string)$r['nationality']) ?>">
        </td>
        <td>
            <input name="number" type="number" value="<?= htmlspecialchars((string)$r['number']) ?>">
        </td>
        <td>
          <select name="team_id">
            <option value="">-- pilih team --</option>
            <?php foreach ($teams as $t): ?>
              <option value="<?= (int)$t['id'] ?>" <?= ($t['id']==$r['team_id'])?'selected':'' ?>>
                <?= htmlspecialchars($t['name']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </td>
        <td>
          <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
          <button type="submit">Update</button>
          <a href="index.php?module=rider&action=delete&id=<?= (int)$r['id'] ?>"
             onclick="return confirm('Hapus rider ini?')">Hapus</a>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php $content = ob_get_clean(); layout('Rider', $content); ?>
