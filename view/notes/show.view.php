<?php require base_path("view/partials/head.php"); ?>
<?php require base_path("view/partials/nav.php"); ?>
<?php require base_path("view/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">Go back....</a>
        </p>
        <p><?= htmlspecialchars($note['body']) ?></p>
    </div>
</main>

<?php require base_path("view/partials/footer.php"); ?>
