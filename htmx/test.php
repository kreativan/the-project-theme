<?php
$headline = isset($_REQUEST["headline"]) ? $_REQUEST["headline"] : "";
?>

<?php if($headline) :?>
  <h2><?= $headline ?></h2>
<?php endif; ?>

<p>
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, quidem. Quo possimus, repellat atque consequuntur reiciendis tempora sunt quidem officia labore cupiditate, quia dolorum unde nihil dolor enim in perspiciatis.
</p>

<a href="#"
  class="uk-text-danger" 
  hx-post="/htmx/blank/"
  hx-target="#target"
  hx-swap="innerHTML"
>
  Remove
</a>