<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class CoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cours::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('entree')->setLabel('Entree'),
            TextField::new('plat')->setLabel('Plat'),
            TextField::new('dessert')->setLabel('Dessert'),
            CollectionField::new('dates')->setLabel('Dates'),
        ];
    }


public function configureActions(Actions $actions): Actions
{
    return $actions
        ->remove(Crud::PAGE_INDEX, Action::NEW)
        ->remove(Crud::PAGE_INDEX, Action::DELETE)
        ->remove(Crud::PAGE_EDIT,Action::SAVE_AND_CONTINUE)

    
    ;
}
public function configureCrud(Crud $crud): Crud
{
    return $crud
        ->showEntityActionsInlined()
    ;
}
}
