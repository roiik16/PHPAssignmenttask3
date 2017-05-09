<?php
    session_start ();
    error_reporting (0);
    
    # Redirect the user to a specific page
    function redirect ($page) {
        header ("Location:" . site_url ($page));
    }

    # Prepares a link to redirect the site
    function site_url ($page) {
        return "/ludwig_buttigieg_DB/" . $page;
    }

    function is_jpg ($file) {
        return exif_imagetype ($file) == IMAGETYPE_JPEG;
    }

    function is_png ($file) {
        return exif_imagetype ($file) == IMAGETYPE_PNG;
    }

    function is_gif ($file) {
        return exif_imagetype ($file) == IMAGETYPE_GIF;
    }
    
    # Check and move a file to the destination
    function move_file ($file, $dest, $name) {
        
        $tmp_name = $file['tmp_name'];
        
        if (!is_jpg ($tmp_name) and !is_png ($tmp_name) and !is_gif ($tmp_name)) {
            return "Please upload a JPEG, PNG or GIF";
        }
        
        $segments = explode ('/', $dest);
        $path = '';
        
        foreach ($segments as $folder) {
            $path .= $folder;
            
            if (!file_exists ($path)) {
                mkdir ($path);
            }
            
            $path .= '/';
        }
        
        $existing = glob ("{$path}{$name}.*");
        foreach ($existing as $item) {
            unlink ($item);
        }
        
        $name .= '.' . pathinfo ($file['name'], PATHINFO_EXTENSION);
        $dest = "{$path}{$name}";
        
        if (move_uploaded_file ($tmp_name, $dest)) {
            return TRUE;
        } else {
            return "File could not be uploaded.";
        }
        
    }

    # Connect to a database
    function connect_to_database () {
        $conn = mysqli_connect ("localhost", "root", "", "ludwig_buttigieg_db")
            or die ("Unable to connect to the database.");
        
        return $conn;
    }

    # Disconnect from a database
    function disconnect_from_database ($conn) {
        mysqli_close ($conn);
    }

    # Check the login details
    function login ($username, $password) {
        
        # Open a connection to the database
        $conn = connect_to_database ();
        
        $username = mysqli_escape_string ($conn, $username);
        
        $query = "
            SELECT *
            FROM tbl_users
            WHERE
                user_username = '{$username}'
        ";
        
        $result = mysqli_query ($conn, $query);
        if (mysqli_num_rows ($result) == 0)
            return FALSE;
        
        # Disconnect from the database
        disconnect_from_database ($conn);
        
        $result = mysqli_fetch_assoc ($result);
        
        if (!password_verify ($password, $result['user_password']))
            return FALSE;
        
        return $result;
        
    }

    # Register a user
  # Register a user
    function register_user ($username, $email, $password, $fname, $lname) {
        
        # Open a connection to the database
        $conn = connect_to_database ();
        
        # Filter all the inputs
        $username = mysqli_escape_string ($conn, $username);
        $email = mysqli_escape_string ($conn, $email);
        
        $password = password_hash ($password, CRYPT_BLOWFISH);
        $password = mysqli_escape_string ($conn, $password);
        $fname = mysqli_escape_string ($conn, $fname);
        $lname = mysqli_escape_string ($conn, $lname);
        $registered = mysqli_escape_string ($conn, time ());
        
        # Prepare the query
        $query = "
            INSERT INTO tbl_users
                (user_username, user_email, user_password, user_fname, user_lname, user_registered)
            VALUES
                ('{$username}', '{$email}', '{$password}', '{$fname}', '{$lname}', '{$registered}')
        ";
        
        
        # Save the query results in a variable
        $result = mysqli_query ($conn, $query);
        
        # Check that the query was successful
        if (mysqli_affected_rows ($conn) != 1) {
            return "The user could not be registered: " . mysqli_error ($conn);
        }
        
        # Disconnect from the database
        disconnect_from_database ($conn);
        
        # There were no errors!
        return TRUE;
        
    }

    
    function get_user ($criteria) {
        
        # Connect to the database
        $conn = connect_to_database ();
        
        # Protect the variable for the query
        $criteria = mysqli_escape_string ($conn, $criteria);
        
        $query = "
            SELECT *
            FROM tbl_users
            WHERE user_id='{$criteria}' OR user_username='{$criteria}'
        ";
    
        # Execute the query and give me the results
        $result = mysqli_query ($conn, $query);
        
        # Disconnect from the database
        disconnect_from_database ($conn);
        
        # If there are no results from the query, stop here
        if (mysqli_num_rows ($result) != 1)
            return FALSE;
        
        # The page will have an associative array available
        return mysqli_fetch_assoc ($result);
        
    }

    function all_users () {
        
        $conn = connect_to_database ();
        
        $query = "
            SELECT *
            FROM tbl_users
            ORDER BY user_username ASC
        ";
        
        $result = mysqli_query ($conn, $query);
        
        disconnect_from_database ($conn);
        
        return $result;
        
    }

    function update_user ($user_id, $email, $fname, $lname) {
        
        if (check_user ($user_id, $email, $fname, $lname))
            return TRUE;
        
        $conn = connect_to_database ();
        
        $user_id = mysqli_escape_string ($conn, $user_id);
        $email = mysqli_escape_string ($conn, $email);
        $fname = mysqli_escape_string ($conn, $fname);
        $lname = mysqli_escape_string ($conn, $lname);
        
        $query = "
            UPDATE tbl_users
            SET
                user_email = '{$email}',
                user_fname = '{$fname}',
                user_lname = '{$lname}'
            WHERE
                user_id = '{$user_id}'
        ";
        
        $result = mysqli_query ($conn, $query);
        $affected = mysqli_affected_rows ($conn);
        
        disconnect_from_database ($conn);
        
        return ($affected == 1);
        
    }

    function check_user ($user_id, $email, $fname, $lname) {
        
        $conn = connect_to_database ();
        
        $user_id = mysqli_escape_string ($conn, $user_id);
        $email = mysqli_escape_string ($conn, $email);
        $fname = mysqli_escape_string ($conn, $fname);
        $lname = mysqli_escape_string ($conn, $lname);
        
        $query = "
            SELECT *
            FROM tbl_users
            WHERE
                user_fname = '{$fname}' AND
                user_lname = '{$lname}' AND
                user_email = '{$email}' AND
                user_id = '{$user_id}'
        ";
        
        $result = mysqli_query ($conn, $query);
        
        disconnect_from_database ($conn);
        
        return (mysqli_num_rows ($result) == 1);
        
    }


    function create_note ($user_id, $title) {
        
        $conn = connect_to_database ();
        
        $user_id = mysqli_escape_string ($conn, $user_id);
        $title = mysqli_escape_string ($conn, $title);
        $date = time ();
        
        $query = "
            INSERT INTO tbl_notes
                (note_title, note_date, user_id)
            VALUES
                ('{$title}', {$date}, {$user_id})
        ";
        
        $result = mysqli_query ($conn, $query);
        
        $id = mysqli_insert_id ($conn);
        
        disconnect_from_database ($conn);
        
        return $id;
        
    }

    function load_note ($user_id, $note_id) {
        
        $conn = connect_to_database ();
        
        $user_id = mysqli_escape_string ($conn, $user_id);
        $note_id = mysqli_escape_string ($conn, $note_id);
        
        $query = "
            SELECT *
            FROM tbl_notes
            WHERE note_id={$note_id} AND user_id={$user_id}
        ";
        
        $result = mysqli_query ($conn, $query);
        
        disconnect_from_database ($conn);
        
        # If there are no results from the query, stop here
        if (mysqli_num_rows ($result) != 1)
            return FALSE;
        
        # The page will have an associative array available
        return mysqli_fetch_assoc ($result);
        
    }

    function update_note ($user_id, $note_id, $title) {
        
        $conn = connect_to_database ();
        
        $user_id = mysqli_escape_string ($conn, $user_id);
        $note_id = mysqli_escape_string ($conn, $note_id);
        $title = mysqli_escape_string ($conn, $title);
        
        $query = "
            UPDATE tbl_notes
            SET
                note_title = '{$title}'
            WHERE
                user_id = '{$user_id}' AND
                note_id = '{$note_id}'
        ";
        
        $result = mysqli_query ($conn, $query);
        $affected = mysqli_affected_rows ($conn);
        
        disconnect_from_database ($conn);
        
        return ($affected == 1);
        
    }


    function save_note_to_disk ($note_id, $content) {
        
        if (!file_exists ('notes')) {
            # MAKE DIRECTORY
            mkdir ('notes');
        }
        
        $filename = "notes/{$note_id}.txt";
        
        if (!$handler = fopen ($filename, 'w+')) {
            return FALSE;
        }
        
        fwrite ($handler, $content);
        
        fclose ($handler);
        
        return TRUE;
        
    }


    function load_note_from_disk ($note_id) {
        
        if (!file_exists ('notes')) {
            # MAKE DIRECTORY
            mkdir ('notes');
            
            return FALSE;
        }
        
        $filename = "notes/{$note_id}.txt";
        
        if (!$handler = fopen ($filename, 'r+')) {
            return FALSE;
        }
        
        $contents = fread ($handler, filesize ($filename));
        
        fclose ($handler);
        
        return $contents;
        
    }
    
?>