<?php

namespace App\Entity;

use App\Repository\AccommodationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AccommodationRepository::class)]
#[ApiResource(
    collectionOperations: [
        "get",
        "post" => ["security" => "is_granted('ROLE_ADMIN')"],
    ],
    itemOperations: [
        "get" => ['groups' => ['readAccommodation']],
        "put" => ["security" => "is_granted('ROLE_ADMIN')"],
    ],
    normalizationContext: ['groups' => ['readAccommodation']]
)]
class Accommodation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['readAccommodation'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['readAccommodation'])]
    private $name;

    #[ORM\Column(type: 'integer')]
    #[Groups(['readAccommodation'])]
    private $price;

    #[ORM\Column(type: 'integer')]
    #[Groups(['readAccommodation'])]
    private $surface;

    #[ORM\Column(type: 'text')]
    #[Groups(['readAccommodation'])]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['readAccommodation'])]
    private $address;

    #[ORM\Column(type: 'string', length: 20)]
    #[Groups(['readAccommodation'])]
    private $zipCode;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['readAccommodation'])]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['readAccommodation'])]
    private $region;

    #[ORM\Column(type: 'integer')]
    #[Groups(['readAccommodation'])]
    private $nbSleeping;

    #[ORM\Column(type: 'integer')]
    #[Groups(['readAccommodation'])]
    private $capacityAdult;

    #[ORM\Column(type: 'integer')]
    #[Groups(['readAccommodation'])]
    private $capacityChild;

    #[ORM\ManyToMany(targetEntity: Equipement::class, inversedBy: 'accommodations')]
    #[Groups(['readAccommodation'])]
    private $equipement;

    #[ORM\ManyToMany(targetEntity: Service::class, inversedBy: 'accommodations')]
    #[Groups(['readAccommodation'])]
    private $service;

    #[ORM\ManyToMany(targetEntity: Activity::class, inversedBy: 'accommodations')]
    #[Groups(['readAccommodation'])]
    private $activity;

    #[ORM\ManyToOne(targetEntity: TypeAccommodation::class, inversedBy: 'accommodations')]
    #[Groups(['readAccommodation'])]
    private $typeAccommodation;

    #[ORM\OneToMany(mappedBy: 'accommodation', targetEntity: Availablity::class)]
    private $availablities;

    #[ORM\OneToMany(mappedBy: 'accommodation', targetEntity: Review::class)]
    private $reviews;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'accommodations')]
    private $user;

    #[ORM\OneToMany(mappedBy: 'accommodation', targetEntity: Booking::class)]
    private $bookings;


    public function __construct()
    {
        $this->equipement = new ArrayCollection();
        $this->service = new ArrayCollection();
        $this->activity = new ArrayCollection();
        $this->availablities = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getNbSleeping(): ?int
    {
        return $this->nbSleeping;
    }

    public function setNbSleeping(int $nbSleeping): self
    {
        $this->nbSleeping = $nbSleeping;

        return $this;
    }

    public function getCapacityAdult(): ?int
    {
        return $this->capacityAdult;
    }

    public function setCapacityAdult(int $capacityAdult): self
    {
        $this->capacityAdult = $capacityAdult;

        return $this;
    }

    public function getCapacityChild(): ?int
    {
        return $this->capacityChild;
    }

    public function setCapacityChild(int $capacityChild): self
    {
        $this->capacityChild = $capacityChild;

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipement(): Collection
    {
        return $this->equipement;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipement->contains($equipement)) {
            $this->equipement[] = $equipement;
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        $this->equipement->removeElement($equipement);

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(Service $service): self
    {
        if (!$this->service->contains($service)) {
            $this->service[] = $service;
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        $this->service->removeElement($service);

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivity(): Collection
    {
        return $this->activity;
    }

    public function addActivity(Activity $activity): self
    {
        if (!$this->activity->contains($activity)) {
            $this->activity[] = $activity;
        }

        return $this;
    }

    public function removeActivity(Activity $activity): self
    {
        $this->activity->removeElement($activity);

        return $this;
    }

    public function getTypeAccommodation(): ?TypeAccommodation
    {
        return $this->typeAccommodation;
    }

    public function setTypeAccommodation(?TypeAccommodation $typeAccommodation): self
    {
        $this->typeAccommodation = $typeAccommodation;

        return $this;
    }

    /**
     * @return Collection<int, Availablity>
     */
    public function getAvailablities(): Collection
    {
        return $this->availablities;
    }

    public function addAvailablity(Availablity $availablity): self
    {
        if (!$this->availablities->contains($availablity)) {
            $this->availablities[] = $availablity;
            $availablity->setAccommodation($this);
        }

        return $this;
    }

    public function removeAvailablity(Availablity $availablity): self
    {
        if ($this->availablities->removeElement($availablity)) {
            // set the owning side to null (unless already changed)
            if ($availablity->getAccommodation() === $this) {
                $availablity->setAccommodation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setAccommodation($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getAccommodation() === $this) {
                $review->setAccommodation(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setAccommodation($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getAccommodation() === $this) {
                $booking->setAccommodation(null);
            }
        }

        return $this;
    }
}
