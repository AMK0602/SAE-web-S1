<?php

namespace Asfc\Sae;

interface IDBRepository {
  public function saveUser(User $user): bool;
  public function saveFormulaire(Formulaire $formulaire):bool;
  public function findUserByEmail(string $email): ?User;
  public function findUserIDByEmail(string $email): int;
  public function getUserRoleByEmail(string $email): string;

  public function getUserByReponses(int $id_user): bool;
    public function getUserbycotisation(int $cotisation): string;
    public function updatecotisation(int $id_user, int $cotisation): bool;
}