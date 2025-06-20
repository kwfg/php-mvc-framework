<?php require base_path('views/partials/head.php') ?>
<?php /* <?php require(__DIR__ . 'partials/head.php') <-- same as above ?> */?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <p class="mb-6">
                        <a href="/notes" class="text-blue-500 underline">go back...</a>
                    </p>
                    <!--to avoid the alert XSS-->
                    <p><?= htmlspecialchars($note['body']); ?></p>

                    <!--Delete note Button-->
                    <form class="mt-6" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                    <!--value is that we're passing in , name is using to identify-->
                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                        <button class="text-sm text-red-500">Delete</button> 
                    </form>


                    <!--button of edit-->
                    <footer class="mt-6">
                    <a href="/note/edit?id=<?= $note['id'] ?>" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
                    </footer>    

                    

    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
