<?php

function messageFlash() : void {
  if(isset($_SESSION['flash'])) {
    foreach($_SESSION['flash'] as $type => $message) {
        echo <<<HTML
          <div class='flash $type'>
              <button onclick="this.parentElement.remove()">X</button>
              <p>$message</p>
          </div>
          HTML;
    }
    unset($_SESSION['flash']);
  }
}