<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GibbonHelpRepository")
 */
class GibbonHelp
{
    /**
     * @var integer|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50)
     */
    private $scope;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return GibbonHelp
     */
    public function setId(?int $id): GibbonHelp
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return GibbonHelp
     */
    public function setName(?string $name): GibbonHelp
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param string|null $scope
     * @return GibbonHelp
     */
    public function setScope(?string $scope): GibbonHelp
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     * @return GibbonHelp
     */
    public function setContent(?string $content): GibbonHelp
    {
        $this->content = $content;
        return $this;
    }
}
