<!-- Création des variables pour injecter les classes de façon dynamique -->
<!-- en fonction de notre position dans la boucle foreach -->
<?php
$cardClass = 'col-md-6';
$cardClassTitle = 'display-3 font-weight-bold';
$cardClassButton = 'btn btn-light';
?>
<section>
  <div class="container-fluid">
    <div class="row mx-0">
      <?php foreach ($fiveFirstCategories as $key => $category) : ?>
        <!--  si l'indice est supérieur à 1 -->
        <!-- on souhaite sortir des cartes en col-md-4 -->
        <!-- et modifier le h2 -->
        <!-- on modifie donc nos variables -->
        <?php
        if ($key > 1) {
          $cardClass = 'col-lg-4';
          $cardClassTitle = 'display-4';
          $cardClassButton = 'btn btn-link text-white';
        }
        if ($key === 3) {
          $cardClassTitle = 'display-4 text-dark';
          $cardClassButton = 'btn btn-link text-dark';
        } ?>
        <!-- Injection de la variable avec la bonne valeur selon l'item du tableau -->
        <div class="<?= $cardClass; ?>">
          <div class="card border-0 text-white text-center"><img src="<?= $absoluteURL . '/' . $category->getPicture(); ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <!-- Injection de la variable avec la bonne valeur selon l'item du tableau -->
                <h2 class="<?= $cardClassTitle; ?> mb-4"><?= $category->getName(); ?></h2>
                <a href=" <?= $router->generate('category', ['id' => $category->getId()]); ?>" class="<?= $cardClassButton; ?>">
                  <?= $category->getSubtitle(); ?>
                </a>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>
</section>