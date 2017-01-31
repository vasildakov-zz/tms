<?php declare(strict_types = 1);

namespace Application\Session;
use Psr\Http\Message\RequestInterface;

/**
 * CreateSessionCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CreateSessionCommand
{
    /**
     * @var string $subdomain
     */
    private $subdomain;

    /**
     * @param string $subdomain
     */
    public function __construct(string $subdomain)
    {
        $this->subdomain = $subdomain;
    }

    /**
     * @return string $subdomain
     */
    public function subdomain() : string
    {
        return $this->subdomain;
    }

    /**
     * @param  RequestInterface $request
     * @return static
     */
    public static function fromRequest(RequestInterface $request)
    {
        $host = $request->getUri()->getHost();
        $domain = explode('.', $host)[0];

        return new static($domain);
    }
}
