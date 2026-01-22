<?php

namespace App\Controller\Admin;

use App\Entity\ArticleCaroussel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCarousselCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArticleCaroussel::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            ImageField::new('image')->setUploadDir('public/images/articles/')->setBasePath('')
            ->hideWhenUpdating(),
            TextField::new('description'),
        ];
    }

}
