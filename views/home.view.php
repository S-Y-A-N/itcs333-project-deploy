<?php require 'partials/head.php'; ?>
<?php require 'partials/protected_header.php'; ?>

<br>

<main>
  <section>
    <form id="search_form" method="GET">
      <fieldset role="group">
        <input type="search" id="search" name="search" placeholder="Looking for a specific room?" />
        <button type="submit" style="border-radius: 0 5rem 5rem 0;">Search</button>
      </fieldset>
    </form>
</section>

<br>

<section class="flex-col">
    <h2>Departments</h2>

    <div class="flex-row">
      <article>
        <h3>Information Systems</h3>
        <img src="https://placehold.co/400x300/960000/white" alt="">
      </article>

      <article >
        <h3>Computer Science</h3>
        <img src="https://placehold.co/400x300/ffbb00/292929" alt="">
      </article>

      <article >
        <h3>Computer Engineering</h3>
        <img src="https://placehold.co/400x300/12206b/white" alt="">
      </article>
    </div>

  </section>
</main>

<?php require 'partials/footer.php'; ?>