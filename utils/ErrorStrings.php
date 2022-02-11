<?php
class ErrorStrings
{
    //login, registration, user_verification
    public static string $empty_err = "To pole nie może być puste";
    public static string $login_err_password = "Nieprawidlowe hasło";
    public static string $login_err = "Nieprawidłowa nazwa użytkownika lub hasło";
    //registration
    public static string $wrong_digits_err = "To pole może zawierać tylko litery, cyfry, podkreślenia i @.";
    public static string $already_taken_err = "Mamy już kogoś takiego w bazie, wpisz coś innego";
    //user_verification
    public static string $password_too_short_err = "Hasło musi się składać z co najmniej sześciu znaków";
    public static string $confirm_password_empty_err = "Potwierdź hasło";
    public static string $confirm_password_err = "Hasła nie są takie same";

    //db_connection
    public static string $db_connection_err = "Brak kontaktu z bazą: ";

}