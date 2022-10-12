<?php

namespace App\Controller;

use App\Entity\ImagesProjet;
use App\Form\ImagesProjetType;
use App\Repository\ImagesProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

//#[IsGranted('ROLE_ADMIN')]
#[Route('/images/projet')]
class ImagesProjetController extends AbstractController
{
    #[Route('', name: 'app_images_projet_index', methods: ['GET'])]
    public function index(ImagesProjetRepository $imagesProjetRepository): Response
    {
        return $this->render('images_projet/index.html.twig', [
            'images_projets' => $imagesProjetRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_images_projet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImagesProjetRepository $imagesProjetRepository, SluggerInterface $slugger): Response
    {
        $imagesProjet = new ImagesProjet();
        $form = $this->createForm(ImagesProjetType::class, $imagesProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imagesFile */
            $brochureFile = $form->get('nomFichier')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('imgProjet_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $imagesProjet->setNomFichier($newFilename);
                $imagesProjetRepository->add($imagesProjet, true);
            } else {
                $this->addFlash('imageError', 'Veuillez sélectionner une image');
                return $this->redirectToRoute('app_images_projet_new', [], Response::HTTP_SEE_OTHER);
            }

            return $this->redirectToRoute('app_images_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('images_projet/new.html.twig', [
            'images_projet' => $imagesProjet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_images_projet_show', methods: ['GET'])]
    public function show(ImagesProjet $imagesProjet): Response
    {
        return $this->render('images_projet/show.html.twig', [
            'images_projet' => $imagesProjet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_images_projet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ImagesProjet $imagesProjet, ImagesProjetRepository $imagesProjetRepository): Response
    {
        $form = $this->createForm(ImagesProjetType::class, $imagesProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imagesProjetRepository->add($imagesProjet, true);

            return $this->redirectToRoute('app_images_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('images_projet/edit.html.twig', [
            'images_projet' => $imagesProjet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_images_projet_delete', methods: ['POST'])]
    public function delete(Request $request, ImagesProjet $imagesProjet, ImagesProjetRepository $imagesProjetRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $imagesProjet->getId(), $request->request->get('_token'))) {
            $imagesProjetRepository->remove($imagesProjet, true);
        }

        return $this->redirectToRoute('app_images_projet_index', [], Response::HTTP_SEE_OTHER);
    }
}
