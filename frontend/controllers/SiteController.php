<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Banner;
use backend\models\PagesDetail;
use backend\models\Testimonial;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        $pagesDetail = PagesDetail::getPagesDetail();
        $testimonialDetail = Testimonial::getTestimonialImages();
        $aboutUsDetails = PagesDetail::getPagesDetail(PagesDetail::TAG_LINE_ID, false);

        $homeDetails = PagesDetail::getPagesDetail(PagesDetail::HOME_PAGE_ID, false, 2);

        $pageContain = "";
        if(!empty($homeDetails)) {
            $pageDetail = $homeDetails[0]['description'];
            $pageDetailAry = explode("<tr>", $pageDetail);
            foreach($pageDetailAry as $pageKey => $pageInfo) {
                if( $pageKey == 0)
                    continue;
                $columnCount = substr_count($pageInfo, "<td>");
                $pageDetailInfoAry = explode("<td>", $pageInfo);
                $temp = 1;
                $pageContain .= '<div class="row about-container">';
                foreach($pageDetailInfoAry as $pageInfoKey => $pageDetailInfo) {
                    if($pageInfoKey == 0)
                        continue;
                    $pageContain .= PagesDetail::DIV_COLUMN_ARRAY[$columnCount];
                    $pageDetailInfo = trim(str_replace(["</td>", "</tr>", "</tbody>", "</table>"], "", $pageDetailInfo));
                    if(strpos($pageDetailInfo, "<img ") !== false){
                        $pageContain .= 'background order-lg-'.$temp.' order-'.$temp.'  wow fadeInUp" style="text-align: center;" >';
                        $imgPath = Banner::getImage($pageDetailInfo);
                        $imgeName = explode(".", $imgPath);
                        $imgId = (isset($imgeName[0]) && !empty($imgeName[0]))? $imgeName[0] : 1;

                        $bannerImg = Banner::getBannerImages($imgeName[0]);
                        $imgAlt = '';
                        $imgPath = 'img/ab-1.jpg';
                        if(!empty($bannerImg)) {
                            $imgPath = $bannerImg['image'];
                            $imgAlt = $bannerImg['title'];
                        }
                        $pageDetailInfo = '<img src="'.$imgPath.'" class="img-fluid" alt="'.$imgAlt.'" style="max-width: 90%;border-radius: 20px;">';
                    } else {
                        $pageContain .= 'content order-lg-'.$temp.' order-'.$temp.' " >';
                    }
                    $pageContain .= $pageDetailInfo."</div>";
                    $temp++;
                }
                $pageContain .='</div>';
            }
        }
        
        return $this->render('index', [
                        'pagesDetail' => $pagesDetail,
                        'aboutUsDetails' => $aboutUsDetails,
                        'homeDetails' => $pageContain,
                        'testimonialDetail' => $testimonialDetail,
                    ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $aboutUsDetails = PagesDetail::getPagesDetail(1, false, PagesDetail::ABOUT_US_PAGES_ID);
        $aboutUsTagLine = PagesDetail::getPagesDetail(PagesDetail::TAG_LINE_ID, false);
        
        return $this->render('about', ['model'=>$aboutUsDetails, 'tagline' => $aboutUsTagLine]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionInfrastructure()
    {
        $aboutUsDetails = PagesDetail::getPagesDetail(PagesDetail::INFRASTRUCTURE_PAGES_ID, false);
        return $this->render('infrastructure', ['model'=>$aboutUsDetails]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

}
