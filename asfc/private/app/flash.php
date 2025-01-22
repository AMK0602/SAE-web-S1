    <?php

function messageFlash() : void {
  if(isset($_SESSION['flash'])) {
    foreach($_SESSION['flash'] as $type => $message) {
        echo <<<HTML
          <div class='flash $type'>
                        <p>$message</p>
              <button onclick="this.parentElement.remove()">Fermer</button>
          </div>
          HTML;
    }
    unset($_SESSION['flash']);
  }
}