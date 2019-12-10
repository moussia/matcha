<?php
require 'database.php';

$seed = $bdd->prepare("INSERT INTO user(
  login,
  name, 
  last_name, 
  mail, 
  password,
  validate,
  genre, 
  adress, 
  zipcode,
  city,
  love,
  orientation, 
  biography, 
  age, 
  latitude, 
  longitude, 
  notif
        ) VALUES 
          (?,?,?,?,?,?, ?, ?,?, ?,?, ?,?, ?,?, ?,?)");

// MECS

$seed->execute(array('Elie1', 'Elie', 'Tordjman', 'elietordjman98@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '15 avenue du 8 mai 1945', '95200', 'Sarcelles', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '21', '49.0060896', '2.4007752', 0));
$seed->execute(array('Dylan23', 'Dylan', 'Tordjman', 'dylantordjman98@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '8 avenue du 8 mai 1945', '95200', 'Sarcelles', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '21', '49.0060896', '2.4007752', 0));
$seed->execute(array('El Cate', 'Sam', 'Teboul', 'elcate@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '12 Rue de Rivoli', '75001', 'Paris', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '24', '48.862291', '2.3365898', 0));
$seed->execute(array('Cabron', 'Castagno', 'Chabbat', 'castagnochab@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '8 Rue Pierre Lefèvre', '93800', 'Epinay-sur-seine', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '22', '48.9618', '2.2976', 0));
$seed->execute(array('Samuel', 'Samuel', 'Cohen', 'cocodu16@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '4 Avenue Mozart', '75016', 'Paris', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '23', '48.854', '2.26915', 0));
$seed->execute(array('Henrico112', 'Henri', 'Mourto', 'henricoo@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '8 Rue Camille Blaisot', '75017', 'Paris', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '23', '48.9001', '2.32862', 0));
$seed->execute(array('Pierre67', 'Pierre', 'Legrand', 'pieroladalpe@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '8 Rue Camille Blaisot', '75017', 'Paris', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '23', '48.9001', '2.32862', 0));
$seed->execute(array('Martin45', 'Martin', 'Boutboul', 'couscous76@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '19 Rue Manin', '75019', 'Paris', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '23', '48.8778', '2.37825', 0));

//MECS->MECS
$seed->execute(array('Isaac55', 'Isaac', 'Marciano', 'isaaciso@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '55 Avenue Marceau', '75008', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '25', '48.8695', '2.29864', 0));
$seed->execute(array('Tommy88', 'Tom', 'Azoulay', 'azoulaytommy@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'man', '34 Avenue des Champs Élysées', '75008', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '21', '48.87', '2.30814', 0));


//FILLES
$seed->execute(array('Haya5', 'Moussia', 'Mmottal', 'moussiamm@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '8 Rue Manin', '75019', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '25', '48.883', '2.38611', 0));
$seed->execute(array('Lea19', 'Lea', 'Ternus', 'leat@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '12 rue du chaussy', '95200', 'Sarcelles', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '21', '48.9927', '2.3779', 0));
$seed->execute(array('Nat65', 'Natanya', 'Cohen', 'nat6373@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '23 Rue du Général de Gaulle', '95880', 'Enghien-les-bains', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '22', '48.9714', '2.30814', 0));
$seed->execute(array('Aline23', 'Aline', 'Croisard', 'aline@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '66 Rue Pierre Demours', '75017', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '23', '48.8823', '2.29694', 0));
$seed->execute(array('Steph16', 'Stephy', 'Marceau', 'stephy@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '27 Rue Beaugrenelle', '75015', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '20', '48.8475', '2.28604', 0));
$seed->execute(array('Cynthia1', 'Cynthia', 'Radi', 'cynthrad@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '17 Rue du Docteur Blanche', '75016', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '24', '48.8543', '2.26569', 0));
$seed->execute(array('Sarah5', 'Sarah', 'Zeitoun', 'sarah767@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '1 Rue de Beaune', '75007', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '21', '48.859013070630496', '2.330050614374648', 0));
$seed->execute(array('Mel12', 'Melanie', 'Partouche', 'mel12@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '12 Avenue du Président Wilson', '75016', 'Paris', 0, 'man', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '23', '48.8651797', '2.2984197', 0));

//FILLES->FILLES
$seed->execute(array('Ashley9', 'Ashley', 'Porto', 'ash122@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '65 Rue de la Pompe', '75016', 'Paris', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '22', '48.8632', '2.27648', 0));
$seed->execute(array('Noa8', 'Noa', 'Sebban', 'nonopt@gmail.com', '$2y$10$O07BInKqaUNjrg5v3J9CwO6Qk4fM.J7ui7pXCWTlNXDZTReHE2LG6', '1', 'woman', '16 Rue Cardinet', '75017', 'Paris', 0, 'woman', 'Voluptates ipsum asperiores nobis accusantium laboriosam. Numquam quaerat quibusdam et aut. Molestiae quod ut deserunt dicta quos.', '21', '48.8815772', '2.3024149', 0));


//ONLINE INITIALISATION
$online = $bdd->prepare("INSERT INTO connexion(
  creator_mail, 
  connexion, 
  time
        ) VALUES 
          (?,?,NOW())");

$online->execute(array('elietordjman98@gmail.com','0'));
$online->execute(array('dylantordjman98@gmail.com','0'));
$online->execute(array('elcate@gmail.com','0'));
$online->execute(array('castagnochab@gmail.com','0'));
$online->execute(array('cocodu16@gmail.com','0'));
$online->execute(array('henricoo@gmail.com','0'));
$online->execute(array('pieroladalpe@gmail.com','0'));
$online->execute(array('couscous76@gmail.com','0'));
$online->execute(array('isaaciso@gmail.com','0'));
$online->execute(array('azoulaytommy@gmail.com','0'));

$online->execute(array('moussiamm@gmail.com','0'));
$online->execute(array('leat@gmail.com','0'));
$online->execute(array('nat6373@gmail.com','0'));
$online->execute(array('aline@gmail.com','0'));
$online->execute(array('stephy@gmail.com','0'));
$online->execute(array('cynthrad@gmail.com','0'));
$online->execute(array('sarah767@gmail.com','0'));
$online->execute(array('mel12@gmail.com','0'));
$online->execute(array('ash122@gmail.com','0'));
$online->execute(array('nonopt@gmail.com','0'));


//INSERT TAGS
$tags = $bdd->prepare("INSERT INTO tags(
  name,
  id_user
          ) VALUES
            (?, ?)");

$tags->execute(array( "athletic", 1));
$tags->execute(array( "musician", 1));
$tags->execute(array( "match", 1));
$tags->execute(array( "athletic", 2));
$tags->execute(array( "musician", 2));
$tags->execute(array( "match", 2));
$tags->execute(array( "athletic", 3));
$tags->execute(array( "musician", 3));
$tags->execute(array( "match", 3));
$tags->execute(array( "cat", 4));
$tags->execute(array( "artist", 4));
$tags->execute(array( "romantic", 4));
$tags->execute(array( "cat", 5));
$tags->execute(array( "artist", 5));
$tags->execute(array( "romantic", 5));
$tags->execute(array( "cat", 6));
$tags->execute(array( "artist", 6));
$tags->execute(array( "romantic", 6));
$tags->execute(array( "cat", 7));
$tags->execute(array( "artist", 7));
$tags->execute(array( "romantic", 7));
$tags->execute(array( "cat", 8));
$tags->execute(array( "artist", 8));
$tags->execute(array( "romantic", 8));
$tags->execute(array( "traveler", 9));
$tags->execute(array( "sleeper", 9));
$tags->execute(array( "reveler", 9));
$tags->execute(array( "traveler", 10));
$tags->execute(array( "sleeper", 10));
$tags->execute(array( "reveler", 10));
$tags->execute(array( "traveler", 11));
$tags->execute(array( "sleeper", 11));
$tags->execute(array( "reveler", 11));
$tags->execute(array( "traveler", 12));
$tags->execute(array( "sleeper", 12));
$tags->execute(array( "reveler", 12));
$tags->execute(array( "traveler", 13));
$tags->execute(array( "sleeper", 13));
$tags->execute(array( "reveler", 13));
$tags->execute(array( "artist", 14));
$tags->execute(array( "worker", 14));
$tags->execute(array( "match", 14));
$tags->execute(array( "artist", 15));
$tags->execute(array( "worker", 15));
$tags->execute(array( "match", 15));
$tags->execute(array( "artist", 16));
$tags->execute(array( "worker", 16));
$tags->execute(array( "match", 16));
$tags->execute(array( "artist", 17));
$tags->execute(array( "worker", 17));
$tags->execute(array( "match", 17));
$tags->execute(array( "geek", 18));
$tags->execute(array( "traveler", 18));
$tags->execute(array( "romantic", 18));
$tags->execute(array( "geek", 19));
$tags->execute(array( "traveler", 19));
$tags->execute(array( "romantic", 19));
$tags->execute(array( "geek", 20));
$tags->execute(array( "traveler", 20));
$tags->execute(array( "romantic", 20));
?>

