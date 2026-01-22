<?php

namespace App\Controller\Admin;

use App\Entity\Met;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class DessetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Met::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du met'),
            ChoiceField::new('type')->setChoices([
                'Entrée' => 'entree',
                'Plat' => 'plat',
                'Dessert' => 'dessert',
            ])
                ->hideOnForm()
                ->hideOnIndex()
                ->hideOnDetail(),
            TextField::new('description', 'Description du met (optionnel)')
                ->hideOnIndex(),
            NumberField::new('price', 'Prix du met')
                ->setNumDecimals(2)
                ->setStoredAsString(false),
            BooleanField::new('enabled', 'Activé')
            ->hideOnForm()
            ,

        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $met = new Met();
        $met->setType('dessert');
        $met->setEnabled(false);
        return $met;
    }

    public function createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $qb->andWhere('entity.type = :type')
            ->setParameter('type', 'dessert');
        return $qb;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Dessert')
            ->setEntityLabelInPlural('Desserts')
            ->setSearchFields(['name', 'description'])
            ->setDefaultSort(['name' => 'ASC']);
    }
}
