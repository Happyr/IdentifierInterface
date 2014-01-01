<?php

namespace HappyR;

/**
 * Class IdentifierInterface
 *
 * Use this interface when you writing bundles that requires relations to other objects or entities
 *
 * @author Tobias Nyholm
 *
 */
interface IdentifierInterface 
{
    public function getId();
} 