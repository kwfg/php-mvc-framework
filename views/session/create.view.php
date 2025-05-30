<?php require base_path('views/partials/head.php') ?>
<?php /* <?php require(__DIR__ . 'partials/head.php') <-- same as above ?> */?>
<?php require base_path('views/partials/nav.php') ?>


<main>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Log In!</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/session" method="POST">
      <div>
        <label for="email" class="sr-only">Email address</label>
          <input type="email" 
          placeholder="Email address" 
          name="email" 
          id="email" 
          autocomplete="email" 
          required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          value="<?= old('email');?>"
          >
          

      </div>


      <div>
        <div class="flex items-center justify-between">
        </div>
        <label for="password" class="sr-only">Password</label>
          <input type="password" 
          placeholder="password" 
          name="password" 
          id="password" 
          autocomplete="current-password" 
          required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          >
          
           <?php /*if (isset($errors['password'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
            <?php endif; */?>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log In</button>
      </div>
      <ul>
           <!--3.2 顯示error畫面：-->
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
    </form>

  </div>
</div>

</main>

<?php require base_path('views/partials/footer.php') ?>
