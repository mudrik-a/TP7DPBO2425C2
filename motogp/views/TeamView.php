<?php require_once __DIR__.'/Template.php'; ob_start(); ?>
<h2>Team</h2>

<!-- Create -->
<form method="post" action="index.php?module=team&action=add">
  <input name="name" placeholder="Team Name" required>
  <input name="country" placeholder="Country">
  <button type="submit">Simpan</button>
</form>

<!-- Read + Update + Delete -->
<table>
  <thead>
    <tr><th>Name</th><th>Country</th><th>Aksi</th></tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row): ?>
      <tr>
        <td>
          <form method="post" action="index.php?module=team&action=update">
            <input name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        </td>
        <td>
            <input name="country" value="<?= htmlspecialchars((string)$row['country']) ?>">
        </td>
        <td>
            <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
            <button type="submit">Update</button>
            <a href="index.php?module=team&action=delete&id=<?= (int)$row['id'] ?>"
               onclick="return confirm('Hapus team ini?')">Hapus</a>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php $content = ob_get_clean(); layout('Team', $content); ?>
