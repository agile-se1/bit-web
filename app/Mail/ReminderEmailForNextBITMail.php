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

class ReminderEmailForNextBITMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public ?ProfessionalField $professionalField1;
    public ?ProfessionalField $professionalField2;
    public ?GeneralPresentation $generalPresentation;

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
            subject: 'Hey, der nächste Berufsinformationstag steht vor der Tür',
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
                text: 'emails.reminderEmailForNextBITMail-text'
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

    private function getProfessionalFields (){
        //Professional fields
        try {
            $professionalFieldDecision1 = ProfessionalFieldDecision::where('user_id', $this->user->id)->first();
            $this->professionalField1 = ProfessionalField::where('id', $professionalFieldDecision1->professional_field_id)->first();
        } catch (\Throwable $e){
          //unset($this->professionalField1);
            $this->professionalField1 = null;
        }

        try{
            $professionalFieldDecision2 = ProfessionalFieldDecision::where('user_id', $this->user->id)->orderBy('id', 'desc')->first();
            $this->professionalField2 = ProfessionalField::where('id', $professionalFieldDecision2->professional_field_id)->first();
        } catch (\Throwable $e){
            //unset($this->professionalField2);
            $this->professionalField2 = null;
        }

        //General presentation
        try{
            $generalPresentationDecision = GeneralPresentationDecision::where('user_id', $this->user->id)->first();
            $this->generalPresentation = GeneralPresentation::where('id', $generalPresentationDecision->general_presentation_id)->first();
        } catch (\Throwable $e){
            //unset($this->generalPresentation);
            $this->generalPresentation = null;
        }
    }
}
