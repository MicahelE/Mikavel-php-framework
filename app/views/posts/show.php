<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"> <i class="fa fa-backward"></i>Back</a>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php if ($data['post']->user_id == $_SESSION['user_id']): ?></p>
<hr>
<a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="bt btn-dark">Edit</a>
<form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" class="pull-right" method="post">
<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>