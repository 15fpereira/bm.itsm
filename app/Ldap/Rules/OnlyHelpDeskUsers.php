<?php

namespace App\Ldap\Rules;

use LdapRecord\Laravel\Auth\Rule;

class OnlyHelpDeskUsers extends Rule
{
    /**
     * Check if the rule passes validation.
     *
     * @return bool
     */
    public function isValid()
    {
        //
        return $this->user->groups()->recursive()->exists(
           // 'cn=HelpDesk,ou=groups,dc=ibc,dc=intranet'
            'cn=HelpDesk,cn=groups,dc=ibc,dc=intranet'
        );

    }
}
