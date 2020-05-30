<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Command\Ddd\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of DirName
 *
 * @property string $name Domain Directory Name
 *
 * @method self setName(string $name) Setter for the $name
 * @see \App\Command\Ddd\ValueObject\DirName::$name Domain Directory Name
 *
 * @method string getName() Getter for the $name
 * @see \App\Command\Ddd\ValueObject\DirName::$name Domain Directory Name
 *
 * @author mosta <info@manonworld.de>
 */
class DirName
{
    
    /**
     *
     * Holds the directory name
     *
     * @var string $name Directory name
     * @Assert\NotBlank
     * @Assert\Regex(
     *      pattern = "/^[a-zA-Z0-9-_.]{2,255}$/",
     *      message = "Invalid Domain Directory Name"
     * )
     */
    private string $name;
    
    /**
     *
     * Getter for the name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     *
     * Setter for the name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
}
