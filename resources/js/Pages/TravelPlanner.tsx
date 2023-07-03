import {Head, useForm} from '@inertiajs/react';
import TextInput from '@/Components/TextInput';
import DatepickerPlanner from '@/Components/DatepickerPlanner';
import PrimaryButton from "@/Components/PrimaryButton";
import Card from "@/Components/Card";
import CalendarIcon from "@/Components/CalendarIcon";
import PageHero from "@/Components/PageHero";
import AspectImageBackground from "@/Components/AspectImageBackground";
import ResponseCard from "@/Components/ResponseCard";
import InputError from "@/Components/InputError";


export default function TravelPlanner({ planner, ...props }: any, ) {
    const { data, setData, get, processing, errors} = useForm({
        locale: '',
        startDate: new Date(),
        endDate: new Date(),
    })

    const handleChangeInicialDate = (selectedDate: Date) => {
        console.log('handleChangeInitialDate', selectedDate)
        setData('startDate', selectedDate);
    }

    const handleChangeFinalDate = (selectedDate: Date) => {
        setData('endDate', selectedDate);
    }

    const handleSubmit: any = (e: SubmitEvent) => {
        e.preventDefault();
        const url = `/search?locale=${data.locale}&startDate=${data.startDate}&endDate=${data.endDate}`
        get(url);
    }

    return (
        <>
        <Head title="Planner" />
        <div className="relative isolate overflow-hidden h-screen bg-gray-900 py-16 sm:py-24 lg:py-32">
          <div className="mx-auto max-w-7xl px-6 lg:px-8">
            <form className="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none" onSubmit={handleSubmit}>
              <PageHero />
              <div className="mx-auto grid max-w-2xl grid-cols-3 gap-x-8 gap-y-16 lg:max-w-none" >
                  <Card text='Diga o local da viagem'>
                      <InputError message={props.errors?.locale}/>
                      <TextInput
                          className='mt-4 w-full p-4 border-zinc-500'
                          onChange={
                          e => setData('locale', e.target.value)
                        }
                      />
                  </Card>
                  <Card text='Escolha a data de chegada' icon={<CalendarIcon />}>
                      <InputError message={props.errors?.startDate as string}/>
                      <DatepickerPlanner text='Data Inicial' handleChange={handleChangeInicialDate}/>
                  </Card>
                  <Card text='Escolha a data de partida' icon={<CalendarIcon />}>
                      <InputError message={props.errors?.endDate as string}/>
                      <DatepickerPlanner text='Data Final' handleChange={handleChangeFinalDate}/>
                  </Card>
              </div>
              <div className='mx-auto flex w-full justify-center items-center'>
                  <PrimaryButton className='py-4 w-96 flex justify-center bg-blue-600'>
                      { processing ? 'Aguarde ...' : 'Planejar'}
                  </PrimaryButton>
              </div>
            </form>
          </div>
            { planner && (
                    <ResponseCard planner={planner} />
                )
            }
            <AspectImageBackground />
        </div>
    </>
)
}
