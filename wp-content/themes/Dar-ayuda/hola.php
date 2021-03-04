<?php

//Añadimos los campos en una nueva sección
add_action( 'show_user_profile', 'agregar_campos_seccion' );
add_action( 'edit_user_profile', 'agregar_campos_seccion' );
 
function agregar_campos_seccion( $user ) {
?>
    <h3><?php _e('Número telefónico'); ?></h3>
    
    <table class="form-table">
        <tr>
            <th>
                <label for="phone_number_user"><?php _e('Teléfono'); ?></label>
            </th>
            <td>
                <input type="text" name="phone_number_user" id="phone_number_user" class="regular-text"
                	value="<?php echo esc_attr( get_the_author_meta( 'phone_number_user', $user->ID ) ); ?>" />
            </td>
        </tr>
    </table>
<?php }

//Guardamos los nuevos campos
add_action( 'personal_options_update', 'grabar_campos_seccion' );
add_action( 'edit_user_profile_update', 'grabar_campos_seccion' );

function grabar_campos_seccion( $user_id ) {
	
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }

    if( isset($_POST['phone_number_user']) ) {
        $phone_number_user = sanitize_text_field($_POST['phone_number_user']);
        update_user_meta( $user_id, 'phone_number_user', $phone_number_user );
    }
}