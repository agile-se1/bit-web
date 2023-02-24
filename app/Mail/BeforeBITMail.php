<?php

namespace App\Mail;

use App\Models\GeneralPresentation;
use App\Models\GeneralPresentationDecision;
use App\Models\ProfessionalField;
use App\Models\ProfessionalFieldDecision;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BeforeBITMail extends Mailable
{
    use Queueable, SerializesModels;

    //Attributes
    public User $user;
    public ?ProfessionalField $professionalField1 = null;
    public ?ProfessionalField $professionalField2 = null;
    public ?GeneralPresentation $generalPresentation = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->getProfessionalFields();
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Der nächste BIT steht vor der Tür',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
            return new Content(
                html: 'emails.reminderEmailForNextBITMail',
                text: 'emails.reminderEmailForNextBITMail-text',
                with: [
                    'first_name' => $this->user->first_name,
                    'last_name' => $this->user->surname,
                ]
            );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    //This function tries to fetch the user decision from the database, if the user didn't make a choice, it sets the object to null
    private function getProfessionalFields (){
        //Professional field 1
        $professionalFieldDecision1 = ProfessionalFieldDecision::where('user_id', $this->user->id)->first();
        if(isset($professionalFieldDecision1)){
            $this->professionalField1 = ProfessionalField::where('id', $professionalFieldDecision1->professional_field_id)->first();
        }

        //Professional field 2
        $professionalFieldDecision2 = ProfessionalFieldDecision::where('user_id', $this->user->id)->orderBy('id', 'desc')->first();
        if(isset($professionalFieldDecision2)){
            $this->professionalField2 = ProfessionalField::where('id', $professionalFieldDecision2->professional_field_id)->first();
        }

        //General presentation
        $generalPresentationDecision = GeneralPresentationDecision::where('user_id', $this->user->id)->first();
        if(isset($generalPresentationDecision)){
            $this->generalPresentation = GeneralPresentation::where('id', $generalPresentationDecision->general_presentation_id)->first();
        }
    }
}
