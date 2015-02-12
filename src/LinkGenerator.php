<?php

namespace GravatarLinkGenerator;

/**
 * Gravatar link generator.
 * 
 * @author Czar Pino <email@czarpino.com>
 */
class LinkGenerator
{
    /**
     * Base gravatar link. See https://en.gravatar.com/site/implement/images/.
     * 
     * @var string
     */
    private $baseLink = 'www.gravatar.com/avatar';
    
    /**
     * Standard gravatar options
     * 
     * @var array
     */
    private $defaultOptions = [
        's' => 80,
        'd' => 'identicon',
        'r' => 'g'
    ];
    
    /**
     * Generate a complete gravatar URL.
     * 
     * @param string $email
     * @param array $gravatarOptions
     * @param string $scheme
     * @return string
     */
    public function generate($email, $gravatarOptions = [], $scheme = 'https')
    {
        foreach ($this->defaultOptions as $key => $defaultOption) {
            if (! isset ($gravatarOptions[$key])) {
                $gravatarOptions[$key] = $defaultOption;
            }
        }
        
        $hash = md5(trim($email));
        $params = http_build_query($gravatarOptions);
        
        return "$scheme://$this->baseLink/$hash?$params";
    }
}

