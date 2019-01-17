
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>
                Name
            </th>
            <th>
                Username
            </th>
            <th>
                Type
            </th>
            <th>
                Email
            </th>
            <th>
                Last Login
            </th>
            <th>
                Actions
                <a id="users-add-btn" class="btn btn-outline-secondary btn-sm ml-2" href="<?= route( "user@add" ) . "?cust=" . $t->c->getId() ?>">
                    <i class="fa fa-plus"></i>
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if( count( $t->c->getUsers() ) ): ?>
            <?php foreach( $t->c->getUsers() as $u ): ?>
                <tr>
                    <td>
                        <?= $t->ee( $u->getName() ) ?>
                    </td>
                    <td>
                        <?= $t->ee( $u->getUsername() ) ?>
                    </td>
                    <td>
                        <?= \Entities\User::$PRIVILEGES[ $u->getPrivs() ] ?>
                    </td>
                    <td>
                        <?= $t->ee( $u->getEmail() ) ?>
                    </td>
                    <td>
                        <?php if( $u->getPreference( 'auth.last_login_at' ) ): ?>
                            <?= date("Y-m-d H:i:s", $u->getPreference( 'auth.last_login_at' )  ) ?>
                        <?php else: ?>
                            <em>Never</em>
                        <?php endif;?>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-outline-secondary" href="<?= route( "user@edit", [ "id" => $u->getId() ] ) ?>">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a class="btn btn-outline-secondary" id="usr-list-delete-<?= $u->getId() ?>" data-object-id="<?=  $u->getId() ?>" href="#">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn btn-outline-secondary"
                                <?php if( $u->getDisabled() ): ?> disabled="disabled" onclick="return( false );"<?php endif; ?>
                               href="<?= route( "switch-user@switch" , [ "id" => $u->getId() ] ) ?>" rel="tooltip" title="Log in as this user...">
                                <i class="fa fa-user"></i>
                            </a>


                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= route('user@welcome-email',  [ 'id' => $u->getId(), 'resend' => 1 ] ) ?>">
                                    Resend welcome email
                                </a>
                                <a class="dropdown-item" href="<?= route( "login-history@view", [ 'id' => $u->getId() ]   )              ?>">
                                    Login history
                                </a>
                            </ul>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">
                    No users found.<br><br>
                    Users can be added by creating / editing contacts and giving the contact login privileges.
                </td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>

