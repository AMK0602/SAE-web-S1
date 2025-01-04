<?php

namespace Asfc\Sae;

interface IDBRepository {
  public function saveUser(User $user): bool;
  public function saveFormulaire(Formulaire $formulaire):bool;
  public function findUserByEmail(string $email): ?User;
  public function getUserRoleByEmail(string $email): string;
}