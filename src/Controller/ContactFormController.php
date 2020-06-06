<?php

namespace App\Controller;

use App\Entity\ContactFormData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;


class ContactFormController extends AbstractController
{
    /**
     * @Route("/api/set_form_datas", name="set_data")
     */

    public function setFormData(Request $request)
    {
		$contactManager = $this->getDoctrine()->getManager();
        $contacts = new ContactFormData();

        $contacts->setName($request->get('name'));
        $contacts->setPhone($request->get('phone'));
        $contacts->setMessage($request->get('message'));

        $contactManager->persist($contacts);
        $contactManager->flush();

        $to = 'romadumych29299@gmail.com';
        $subject = 'Some subject!';
        $message = 'Message!';
        $headers = 'From: romadumych29299@gmail.com' . "\r\n" .
                   'Reply-To: romadumych29299@gmail.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        mail( $to, $subject, $message, $headers );

        return $this->json(['status'=> true]);
    }

    /**
     * @Route("/api/get_form_datas", name="get_data")
     */

    public function getFormData()
    {

        $form_data = $this->getDoctrine()->getRepository(ContactFormData::class)->findAll();
        return $this->json($form_data);
    }

}